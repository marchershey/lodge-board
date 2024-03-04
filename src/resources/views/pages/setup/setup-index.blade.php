<div class="mx-auto tablet-sm:max-w-md" wire:init="load" x-data="{
    step: @entangle('current_step')
}">
    <h1 class="mb-8 text-center page-title">Welcome to {{ config('app.name') }}!</h1>
    <div class="w-full" wire:loading>
        <div class="text-center card card-padding">
            <x-spinner size="w-12 h-12" />
        </div>
    </div>
    <div wire:loading.remove>
        <div x-cloak x-show="step == 1">
            <div class="card card-padding card-flex">
                <div class="card-header">
                    <h1>Application Setup</h1>
                    <p class="mt-4">Welcome to {{ config('app.name') }}. We're so excited to have you onboard! It appears you're the first visitor to you personal {{ config('app.name') }}, so we're assuming you'll be the Administrator. If that's not the case, please contact your Adminstrator to setup your LodgeBoard.</p>
                    <p class="mt-4">Before we get into it, we need some basic information from you about your business. When you're ready to begin, simply click "Continue"</p>
                </div>
                <div class="text-center">
                    <button class="button button-lg button-full" wire:click="nextStep">Continue</button>
                </div>
            </div>
        </div>
        {{-- Site configuration --}}
        <div x-cloak x-show="step == 2">
            <livewire:pages.setup.steps.site-config />
        </div>
        {{-- First Rental --}}
        <div x-cloak x-show="step == 3">
            <livewire:pages.setup.steps.first-rental />
        </div>
        {{-- Rental Photos --}}
        <div x-cloak x-show="step == 4">
            <livewire:pages.setup.steps.rental-photos />
        </div>

        @if (app()->isLocal())
            <div class="text-center card-padding">
                <button wire:click="previousStep">Go back</button>
            </div>
        @endif
    </div>
</div>
