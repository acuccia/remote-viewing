@extends('app')


@section('content')

    @if (Auth::guest())
        <h3 class="text-center">You are not logged in</h3>
        <p class="text-center"><a href="/auth/login">Log in</a> or <a href="/auth/register">Create an Account</a> to start viewing!</p>
    @endif


    <div class="jumbotron">
        <p>
            This project aims to test the technique of <a href="#remoteviewing">Remote Viewing</a>
            through a series of trials in which the viewer attempts to select a particular
            <a href="#target">target</a> from amongst a group of non-target locations. The
            hypothesis is that a remote viewer will be able to pick out the
            <a href="#target">target</a> better than would be predicted by chance alone.
        </p>
    </div>

    <div>
        <h2 class="text-center">Overview</h2>

        <p class="lead">
            In this experiment, you will be given one test each day for ten days. The test will consist
            of trying to pick out the correct <a href="#target"></a>target</a> from amongst five
            possible choices. The choices will all be links to web pages with information
            about the possible targets. Your goal is to do better than chance. For instance,
            if you select one of the five choices randomly, you would be expected to be
            correct 20 percent of the time, or get two correct answers out of ten. Because you
            are able to select multiple answers for any given experiment, the odds will be
            different for those experiments. See <a href="#stats">here</a> for a more complete
            explanation of the <a href="#stats">statistics</a>.
        </p>

        <h2 class="text-center">Instructions</h2>
        <p class="lead">
            <a href="/auth/login">Log in</a> to your account. If you do not have an account,
            you will first need to <a href="/auth/register">sign up</a>. You should bookmark
            the website since you will be visiting the site every day for 10 days.
        </p>

        <p class="lead">
            Go to your home page (click the "Home" link in the navigation bar). If there
            is a <a href="#target">target</a> available, you will see the experiment number
            and "Begin" at the top of the page. Follow the prompts to begin the experiment.
            If there is no target available, you will see the message "No Active Experiment".
            If the next experiment has been scheduled, you will see the time until the next
            target is available.
        </p>

        <p class="lead">
            First you will be given the <a href="#coordinates">coordinates</a> for the
            current target. Use those coordinates to try to identify pieces of information
            in that target. This information can be in the form of a picture in your mind,
            an emotion, a feeling, a sense perception, etc. Some examples of what one might
            come up with are: "I felt like it was a very hot climate", "There were animals
            present", "There was a sense of awe", "It was very colorful", "It looked like
            a huge mansion", "I felt sad", "I felt happy", "Something bad happened". Or you
            could get shapes in your mind and draw them. Write down what you perceived. If
            you feel that you did not perceive anything, then simply imagine what you might
            see if you could perceive something. When you are ready, click to go to Step 2.
        </p>

        <p class="lead">
            You will now be presented with the five possible targets to choose from. Click
            each link (it will open in a new window or tab) and see how well it matches
            what you saw or imagined in the previous step. Read the descriptions, look at
            the photos, and click on the links if necessary to get a feel for it. When you
            have viewed all five choices, choose the one that you think is the real target.
            If more than one target is a very good match, you can select more than one.
            However, the more you choose, the more correct answers you will need to get to do
            better than chance (see the <a href="#statistics">statistics</a> section below).
            Click "Save" when you are satisfied with your answer.
        </p>

        <p class="lead">
            You will now be presented with your choices, and will be given the option to
            review and edit them. Once you hit the "Confirm" button, your choices cannot
            be changed. You must confirm your choices before the experiment closes, which
            will be 24 hours from when it became active (not when you began). Experiments
            will typically become active at 3:00 AM pacific time on the day of the
            experiment and close at 3:00 AM the next day, so you have the choice to do it
            early in the morning or late at night.
        </p>

        <p class="lead">
            In order to avoid anyone being made aware of the actual target for an experiment,
            the target will not be revealed until the experiment is closed. That means that
            after you have confirmed your choice(s), you will usually have to wait until the
            next day to check your answer. At that time, the answer will be revealed and you
            can move on to the next experiment.
        </p>

    </div>

    <div class="jumbotron">
        <h2 class="text-center">Definitions</h2>

        <h4><a name="remoteviewing">Remote Viewing</a></h4>
        <p class="lead">
            Identifying a particular target that is remote in time and/or
            space by focusing on its coordinates
        </p>

        <h4><a name="target">Target</a></h4>
        <p class="lead">
            A particular place or event selected by a <a href="#facilitator">facilitator</a> and
            given to the remote viewer in the form of <a href="#coordinates">coordinates</a>
        </p>

        <h4><a name="facilitator">Facilitator</a></h4>
        <p class="lead">
            One who chooses a particular target and assigns coordinates
            to it
        </p>

        <h4><a name="coordinates">Coordinates</a></h4>
        <p class="lead">
            Arbitrary numbers given to a target to identify it. They have no
            meaning or significance other than to identify the target. The
            purpose of the coordinates are to keep the viewer focused on
            the target. Coordinates always come in the form of 2 sets of 4
            numbers (for example 1234 5678), and are unique to each target.
        </p>
    </div>

@stop

