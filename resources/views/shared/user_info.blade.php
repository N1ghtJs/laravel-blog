<div class="z-panel">
    <div class="z-panel-header">
        {{ Auth::user()->name }}
    </div>
    <div class="z-panel-body" style="text-align: center;">
        <img class="z-avatar" src="{{ Auth::user()->gravatar('140') }}" style="display: inline-block;">
    </div>
</div>
