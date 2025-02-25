<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" crossorigin="anonymous"></script>
</head>

<style>
    @keyframes slideIn {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    .animate-slide-in {
        animation: slideIn 0.3s ease-out;
    }
    dialog::backdrop {
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
    }
    dialog {
        border: none;
        padding: 0;
        border-radius: 0.75rem;
        max-width: 42rem;
        width: 90%;
    }
    .modal-header {
        background: linear-gradient(135deg, #4F46E5, #3B82F6);
    }
    .btn-primary {
        background: linear-gradient(135deg, #4F46E5, #3B82F6);
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);
    }
    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 8px -1px rgba(79, 70, 229, 0.3);
    }
    .btn-secondary {
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(4px);
    }
    .btn-secondary:hover {
        transform: translateY(-1px);
        background: rgba(255, 255, 255, 0.9);
    }
</style>

<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen flex items-center justify-center">

    

    <div class="container items-center mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 px-4">
        <!-- Card 1 -->
        <div class="transform hover:-translate-y-1 transition-all duration-300">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 flex justify-between items-center">
                    <span class="text-sm font-medium tracking-wider">Nomor Urut</span>
                    <span class="text-3xl font-bold"><?php echo e($data->no_urut); ?></span>
                </div>
                <div class="flex">
                    <div class="w-1/3 relative group">
                        <img src="<?php echo e(asset('storage/' . $data->image)); ?>" class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"/>
                    </div>
                    <div class="w-2/3 p-6">
                        <h3 class="font-bold text-2xl text-gray-800 mb-2"><?php echo e($data->ketua->nama); ?> - <?php echo e($data->wakil1->nama); ?> - <?php echo e($data->wakil2->nama); ?> </h3>
                        <p class="text-gray-600 text-base mb-6"><?php echo e($data->visimisi); ?></p>
                        <div class="flex gap-4">
                            <button data-modal-target="#visiMisiModal1" class="btn-secondary px-5 py-2.5 text-gray-700 rounded-lg border border-gray-200">Detail</button>
                            <button class="btn-primary px-8 py-2.5 text-white rounded-lg">Vote</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    
    <!-- Enhanced Modal for Candidate 1 -->
    <dialog id="visiMisiModal1" class="shadow-2xl">
        <div class="animate-slide-in bg-white rounded-xl overflow-hidden">
            <div class="modal-header p-6 text-white relative bg-blue-600">
                <button data-modal-close class="absolute top-4 right-4 text-white/80 hover:text-white transition-colors">
                    <i class="fas fa-times"></i>
                </button>
                <h3 class="font-bold text-2xl">Visi & Misi Kandidat Nomor Urut <?php echo e($data->no_urut); ?></h3>
            </div>
            <div class="p-6">
                <div class="bg-blue-50 rounded-lg p-4 mb-6">
                    <h4 class="font-semibold text-blue-800 mb-2">Visi & Misi</h4>
                    <p class="text-blue-700"><?php echo e($data->visimisi); ?></p>
                </div>
                
            </div>
            <div class="border-t border-gray-100 p-6 bg-gray-50 flex justify-end gap-4">
                <button data-modal-close class="btn-secondary px-6 py-2.5 text-gray-700 rounded-lg border border-gray-200">Tutup</button>
            </div>
        </div>
    </dialog>
    
    <!-- Enhanced Modal for Candidate 2 -->
        <dialog id="visiMisiModal2" class="shadow-2xl">
        <div class="animate-slide-in bg-white rounded-xl overflow-hidden">
            <div class="modal-header p-6 text-white relative bg-blue-600">
                <button data-modal-close class="absolute top-4 right-4 text-white/80 hover:text-white transition-colors">
                    <i class="fas fa-times"></i>
                </button>
                <h3 class="font-bold text-2xl">John Doe - Visi & Misi</h3>
                <p class="text-white/80 mt-2">Kandidat Nomor Urut 01</p>
            </div>
            <div class="p-6">
                <div class="bg-blue-50 rounded-lg p-4 mb-6">
                    <h4 class="font-semibold text-blue-800 mb-2">Visi</h4>
                    <p class="text-blue-700">Menciptakan lingkungan yang lebih baik untuk masa depan yang berkelanjutan</p>
                </div>
                <div class="space-y-4">
                    <h4 class="font-semibold text-gray-800">Misi:</h4>
                    <ul class="list-disc list-inside space-y-2 text-gray-600">
                        <li>Mengembangkan program pendidikan berkelanjutan</li>
                        <li>Meningkatkan kesejahteraan masyarakat</li>
                        <li>Membangun infrastruktur ramah lingkungan</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-100 p-6 bg-gray-50 flex justify-end gap-4">
                <button data-modal-close class="btn-secondary px-6 py-2.5 text-gray-700 rounded-lg border border-gray-200">Tutup</button>
            </div>
        </div>
    </dialog>
    
    <script>
        const navToggle = document.getElementById("nav-toggle");
        const navContent = document.getElementById("nav-content");

        navToggle.addEventListener("click", () => {
            navContent.classList.toggle("hidden");
        });

        const userButton = document.getElementById("userButton");
        const userMenu = document.getElementById("userMenu");

        document.addEventListener("click", (event) => {
            const isClickInsideMenu = userMenu.contains(event.target);
            const isClickOnButton = userButton.contains(event.target);

            if (!isClickInsideMenu && !isClickOnButton) {
                userMenu.classList.add("invisible");
            } else {
                userMenu.classList.toggle("invisible");
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-modal-target]').forEach(button => {
                button.addEventListener('click', () => {
                    const modal = document.querySelector(button.dataset.modalTarget);
                    if (modal) {
                        modal.showModal();
                        modal.querySelector('.animate-slide-in').style.opacity = '0';
                        setTimeout(() => {
                            modal.querySelector('.animate-slide-in').style.opacity = '1';
                        }, 50);
                    }
                });
            });
            document.querySelectorAll('[data-modal-close]').forEach(button => {
                button.addEventListener('click', () => {
                    const modal = button.closest('dialog');
                    if (modal) modal.close();
                });
            });
        });
    </script>
</body><?php /**PATH C:\laragon\www\pemilihan_osisfix\resources\views/admin/Kandidat/show.blade.php ENDPATH**/ ?>