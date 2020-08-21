<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <form wire:submit.prevent='applyCoupon'>
        <input class="input-text" placeholder="Coupon code" type="text" wire:model="coupon">
        <input class="button" value="Apply coupon" type="submit">
    </form>
</div>
