@extends('app')


@section('content')

    @if (Auth::guest())
        <h3 class="text-center">You are not logged in</h3>
        <p class="text-center"><a href="/auth/login">Log in</a> or <a href="/auth/register">Create an Account</a> to start viewing!</p>
    @endif

    <div>
        <h2 class="text-center">Overview</h2>

        <p class="lead">
            This project aims to test the technique of <a href="#remoteviewing">Remote Viewing</a>
            through a series of trials in which the viewer attempts to select a real
            <a href="#target">target</a> from amongst a group of possible targets. The
            hypothesis is that a remote viewer will be able to pick out the actual
            <a href="#target">target</a> better than would be predicted by chance alone.
        </p>
        <p class="lead">
            In this experiment, you will be given one test each day for ten days. The test will consist
            of trying to pick out the correct <a href="#target"></a>target</a> from amongst five
            possible choices. The choices will all be links to web pages with information
            about the possible targets. Your goal is to do better than chance. For instance,
            if you select one of the five choices randomly, you would be expected to be
            correct 20 percent of the time, or get two correct answers out of ten. Because you
            are able to select multiple answers for any given experiment, the odds will be
            different for those experiments. If you select all five choices, your odds of getting
            the correct answer by chance alone will be 100 percent (obviously), so that strategy
            will not allow you to do better than chance. In fact, choosing all five choices for
            an experiment will have no effect at all on your final statistics. It essentially
            invalidates that experiment for you. See <a href="#stats">here</a> for a more complete
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
            better than chance (see the <a href="#stats">statistics</a> section below).
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

    <div class="jumbotron">
        <h2 class="text-center"><a name="stats">Statistics</a></h2>

        <h4>Disclaimer</h4>
        <p>
            I am not a statistics expert. In fact, I am terrible at
            probability and statistics. But I've thought about it a lot and asked
            some smart people some questions, so I'm pretty sure what I'm saying is
            accurate. But if you disagree with something in here, or find a mistake,
            feel free to let us know.
        </p>

        <h4>Calculating Expected Outcomes</h4>
        <p>
            We are looking at this as a comparison against random probability. In this
            case, there is one "correct" answer and four "incorrect" answers. It's like
            being blindfolded and reaching into a bag containing one red marble and four
            blue marbles. If you pull out one marble, the chance of it being the red
            marble is 1 in 5, or 20%. If you pulled out two marbles, the chance of one of
            them being red is 2 in 5, or 40%.
        </p>
        <p>
            So, depending on how many selections you make each time, your chance of getting
            the red marble (or correct answer) is different - either 20%, 40%, 60%, 80% or
            100%. It is slightly different if you make a different number of selections each
            day (for example if you make one selection on some days, two selections on other days,
            etc.), but it just alters the final percentage number (see "Complicated Percentages"
            below). Once you know that percentage number, let's call it p, and the total number
            of tries, let's call that t, you can calculate how many times you should expect to
            get the red marble.
        </p>
        <p>
            To calculate your expected number of correct answers, you would multiply your
            expected percentage by the number of trials (p x t). For example, if your expected
            percentage is 30% (also written as 0.30) and you did 10 trials, you should expect,
            just by chance, to get 3 correct answers (0.30 x 10 = 3).
        </p>

        <h4>Complicated Percentages</h4>
        <p>
            In order to calculate your expected percentage, you need to know how many selections
            you made each day and how many possible choices there were each day. In our experiment,
            there are always 5 choices, and you can select from 1 to 5 of them. Calculating your
            total expected percentage involves weighting each set of selections and choices in a
            very similar way to GPA calculation.
        </p>
        <p>
            For example, let's say you had 3 experiments where you selected 1 choice (group A),
            6 experiments where you selected 2 choices (group B) and 1 experiment where you
            selected 3 choices (group C). For group A, you would expect 0.20 (1 out of 5 choices)
            times 0.3 (3/10 of the experiments), which equals 0.06. For group B, it would be
            0.40 (2 out of 5) times 0.6 (6/10 of the experiments), which is 0.24. For group C,
            it would likewise be 0.6 times 0.1, which is 0.06. If you add those all up, you get
            0.06 + 0.24 + 0.06 = 0.36.
        </p>
        <p>
            However, a shortcut (which I use) is to take the total number of selections made in
            all 10 experiments, and divide it by the total possible choices, which is just 5
            times the number of experiments (10), equalling 50. So for our example above, the
            number of selections is 3 for group A, 12 for group B and 3 for group C, totalling
            18 for all 10 experiments. So we do 18/50, which is 0.36, the same answer we got from
            the GPA-style calculation above.
        </p>

        <h4>How Many Should I Choose?</h4>
        <p>
            If you choose all five targets every day, you are obviously guaranteed to have
            selected the correct target, since it is one of those five. In that case, after 10
            experiments, you will have 10 correct answers, for a 100% hit rate. Of course, by
            chance (see above) you would expect to get (50/50) x 10 = 10. So you will never be
            able to "beat" the odds (you cannot get more than 10 correct answers in 10 experiments).
        </p>
        <p>
            So, how many should you choose? In fact, it doesn't really matter in the long run.
            The calculation takes into account how many choices you make, and you cannot get an
            advantage (or disadvantage) by changing how many selections you make. However, let's
            say you choose 4 targets per day. You would expect to get 80% correct by chance, so
            you will need to get more than 8 out of 10 to beat the odds. That doesn't give you
            a lot of room for an effect to show up with a small number of trials. However, if you
            only select 1 target per experiment, you would only expect to get 20% (or 2 out of 10)
            correct by chance, so that leaves you more room to show an effect.
        </p>

        <h4>Dive Deeper</h4>
        <p>
            In order to fully understand the results of an experiment like this, there are a
            number of other factors that you need to consider. For example, how the number of trials
            affects the confidence of the result (10 coin flips will likely not show you that it's
            a 50/50 chance of heads or tails). In addition, it will help to be familiar with
            concepts like "statistical power", "statistical significance" and "standard deviation".
            These are all beyond my ability to explain, so I would refer you to
            <a href="https://en.wikipedia.org/wiki/Statistics">the wikipedia page on statistics</a>.
        </p>

    </div>
@stop

