<?php if (isset($component)) { $__componentOriginal1f7b3c69a858611a4ccc5f2ea9729c12 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f7b3c69a858611a4ccc5f2ea9729c12 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar-layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="p-6 bg-gray-100 min-h-screen">
        <!-- Header Section -->
        <div class="bg-gray-900 rounded-lg shadow-lg p-6 mb-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <h3 class="text-xl font-bold text-white mb-4 md:mb-0">Data Kandidat</h3>
                <a href="<?php echo e(url('/Kandidat/create')); ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Kandidat
                </a>
            </div>
        </div>
        

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-900 text-white">
                        <tr>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border border-gray-600">No Urut</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border border-gray-600">Calon Ketua Osis</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border border-gray-600">Calon Waketu 1</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border border-gray-600">Calon Waketu 2</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border border-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-center border border-gray-200"><?php echo e($item->no_urut); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-center border border-gray-200">
                                <?php echo e($item->ketua->nama); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center border border-gray-200">
                                <?php echo e($item->wakil1->nama); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center border border-gray-200">
                                <?php echo e($item->wakil2->nama); ?>

                            </td>
                                                    
                            <td class="px-6 py-4 whitespace-nowrap border border-gray-200">
                                <div class="flex justify-center space-x-2">
                                    
                                    <form onsubmit="return confirm('apakah anda yakin ingin menghapus data ini?')" action="<?php echo e(route('Kandidat.destroy', $item->id)); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" name="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm transition duration-300 ease-in-out">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f7b3c69a858611a4ccc5f2ea9729c12)): ?>
<?php $attributes = $__attributesOriginal1f7b3c69a858611a4ccc5f2ea9729c12; ?>
<?php unset($__attributesOriginal1f7b3c69a858611a4ccc5f2ea9729c12); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f7b3c69a858611a4ccc5f2ea9729c12)): ?>
<?php $component = $__componentOriginal1f7b3c69a858611a4ccc5f2ea9729c12; ?>
<?php unset($__componentOriginal1f7b3c69a858611a4ccc5f2ea9729c12); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\pemilihan_osisfix\resources\views/admin/Kandidat/index.blade.php ENDPATH**/ ?>