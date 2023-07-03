@extends ('layout.frontend', ['title' => 'Home'])

@section ('content')

<section class="w3-padding">
        
    <h2 class="w3-text-blue">About Me!</h2>

    <p>
        Quisque felis ex, pellentesque vel elementum eu, bibendum vel massa. Donec id feugiat 
        erat. Aliquam commodo rutrum velit, vitae vestibulum purus ullamcorper vestibulum. Orci 
        varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
    </p>

    <h3>My Skills</h3>

    <ul>
        <li>PHP</li>
        <li>Laravel</li>
        <li>MySQL</li>
    </ul>

</section>

<hr>

<hr>

<section class="w3-padding">

    <h2 class="w3-text-blue">Contact Me</h2>

    <p>
        Phone: 111.222.3333
        <br>
        Email: <a href="mailto:email@address.com">email@address.com</a>
    </p>

</section>

@endsection
