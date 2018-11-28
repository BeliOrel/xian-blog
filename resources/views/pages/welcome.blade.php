@extends('main')

@section('title', 'Homepage')

@section('content')
    <div class="row d-flex align-items-center">
        <div class="col-md-12">
            <div class="jumbotron mt-3">
                <h1 class="display-4">Welcome to My Blog!</h1>
                <p class="lead">I'm happy to see you visiting my den of rumble. Feel free to explore.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
            </div>
        </div>
    </div> <!-- end of jumbotron -->

    <div class="row">
        <div class="col-md-8">
            <div class="post my-2">
                <h3>Post Title 1</h3>
                <p>Here are Jiang Cheng’s requirements in his partner: naturally beautiful, graceful and obedient, hard-working and thrifty, coming from a respected family, cultivation level not too high, personality not too strong, talking not too much, voice not too loud, spending money not too much. And must treat Jin Ling nicely.</p>
                <a href="#" class="btn btn-primary">Read More</a>                  
            </div>

            <hr>

            <div class="post my-2">
                <h3>Post Title 2</h3>
                <p>It was way too easy to make Xingchen laugh. Both Xueyang and Ah Qing knew about this but they would never tell Xingchen. Song Lan did not know about this, because the dude never ever laughed…</p>
                <a href="#" class="btn btn-primary">Read More</a>              
            </div>

            <hr>

            <div class="post my-2">
                <h3>Post Title 3</h3>
                <p>Lan Qiren has a beard from a young age. However, it was shaved clean by Zangse Sanren. He was so mad! <br>
                    Later, the son of Zangse Sanren also shaved his beard…</p>
                <a href="#" class="btn btn-primary">Read More</a>                  
            </div>

            <hr>

            <div class="post my-2">
                <h3>Post Title 4</h3>
                <p>In order to confess to Jiang Yanli, Jin Zixuan specifically hired someone to write a long long long cheesy essay, and he learnt it by heart. Turned out he did not use a single sentence. <br>
                    One day, after their marriage, he felt that the opportunity had come, so he read it out loud to Jiang Yanli. Upon hearing it, Jiang Yanli gently stroked his cheek, turned her back and walked away. She was graceful enough to not roll on the floor laughing in front of her husband.</p>
                <a href="#" class="btn btn-primary">Read More</a>                 
            </div>
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h2 class="my-2">Sidebar</h2>
        </div>
    </div>
@endsection
