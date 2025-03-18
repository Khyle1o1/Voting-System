@if($user->year_level == 2)
    <!-- 2nd year representatives -->
    @include('SBO_Vote.officer_containers.representatives.2nd')
@elseif($user->year_level == 3)
    <!-- 3rd year representatives -->
    @include('SBO_Vote.officer_containers.representatives.3rd')
@elseif($user->year_level == 4)
    <!-- 4th year representatives -->
    @include('SBO_Vote.officer_containers.representatives.4th')
@endif
