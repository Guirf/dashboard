<x-app-layout>
<div class="container">
    <form method="get" wire:click.prevent="test">
        <button class="btn btn-success" type="submit">click</button>
    </form>
    @livewireScripts
</div>
</x-app-layout>