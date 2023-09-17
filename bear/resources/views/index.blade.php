<!DOCTYPE html>
<html lang="en">
@include('components.head')

<body>
    @guest
        @include('login')
    @else
        @include('components.header')
        @include('components.cards')
        @include('components.footer')
    @endguest

</body>

</html>
