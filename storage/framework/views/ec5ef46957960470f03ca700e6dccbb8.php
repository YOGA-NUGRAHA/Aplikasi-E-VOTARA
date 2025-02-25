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
    <div class="w-full  bg-white shadow-lg rounded-lg p-6">
        <div class="bg-gray-900 text-white font-bold text-lg p-4 rounded-t-lg">
            Tambah Siswa
        </div>

        <?php if($errors->any()): ?>
                <div class="alert">
                    <ul class="list-disc pl-5">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($item); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                 
        <div class="p-6 ">
            <form action="<?php echo e(url ('admin/TabelSiswa')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <label for="nisn" class="block text-gray-700 font-semibold">NISN</label>
                    <input type="text" id="nisn" name="nisn" placeholder="Masukan NISN Siswa"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold">NAMA LENGKAP SISWA</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukan Nama Lengkap"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="jurusan" class="block text-gray-700 font-semibold">Jurusan</label>
                    
                        <select name="jurusan" id="jurusan" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                            <option value="RPL">RPL</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Elektronika">Elektronika</option>
                            <option value="Las">Las</option>
                            <option value="Mesin">Mesin</option>
                        </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                        Submit
                    </button>
                </div>
            </form>
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
<?php endif; ?><?php /**PATH C:\laragon\www\pemilihan_osisfix\resources\views/admin/TabelSiswa/create.blade.php ENDPATH**/ ?>