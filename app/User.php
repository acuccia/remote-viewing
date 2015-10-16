<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Mail;
use Log;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function trials()
    {
        return $this->hasMany(\App\Trial::class);
    }

    /**
     * All the selections made by the user in all the trials
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function selections()
    {
        return $this->hasManyThrough(\App\Selection::class, Trial::class);
    }

    public function expectedPercentage()
    {
        // total selections / total choices

        $selCount = $this->selections()->whereHas('trial', function($q) {
            $q->where('complete', true);
        })->count();
        $choiceCount = $this->trials()->whereComplete(true)->count() * 5;

        return ($selCount/$choiceCount) * 100;
    }

    public function actualPercentage()
    {
        return ($this->trials()->whereComplete(true)->has('hits', '>', 0)->count() /
            $this->trials()->whereComplete(true)->count()) * 100;
    }

    public function welcome()
    {
        $data = [
            'user'      => $this->name
        ];
        $user = $this;

        $result = Mail::send('emails.welcome', $data, function ($message) use ($user) {
            $message->from('anne.basile@gmail.com', 'Remote Viewing');
            $message->to($user->email)->subject('Welcome to the Remote Viewing Test!');
        });
    }

    public function remind()
    {
        $user = $this;

        Log::info('Sending reminder for: '. $user->name);

        Mail::send('emails.remind', [], function ($message) use ($user) {
            $message->from('anne.basile@gmail.com', 'Remote Viewing');
            $message->to($user->email)->subject('Remote Viewing Reminder');
        });

    }

}
