<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['active' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<a <?php echo e($attributes); ?>

    class="flex items-center p-2 text-base font-medium <?php echo e($active ? 'active-sidebar-item' : 'text-gray-900 hover:bg-gray-100'); ?> rounded-lg dark:text-white dark:hover:bg-gray-700 group"
    aria-current="<?php echo e($active ? 'page' : false); ?>">
    <svg class="w-6 h-6 <?php echo e($active ? 'text-white' : 'text-gray-800'); ?> dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v5m-3 0h6M4 11h16M5 15h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1Z"/>
    </svg>
    <span class="ml-3"><?php echo e($slot); ?></span>
</a>
<?php /**PATH C:\Users\lenovo\Downloads\test\bcc-pengabdiandosen\resources\views\components\sidebar-link.blade.php ENDPATH**/ ?>