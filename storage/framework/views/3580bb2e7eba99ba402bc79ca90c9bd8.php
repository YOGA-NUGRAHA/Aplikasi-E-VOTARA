<!-- chart-view.blade.php -->
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
                <h3 class="text-xl font-bold text-white mb-4 md:mb-0">Jumlah Suara Kandidat</h3>
            </div>
        </div>
        
        <!-- Chart Section -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6">
            <div class="mb-8" id="chart-container"></div>
        </div>
    </div>

    <?php
        $chartData = $candidates->map(function ($candidate) {
            return [
                'label' => 'No Urut ' . $candidate->no_urut,
                'value' => $candidate->votes_count,
            ];
        });
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chartData = <?php echo json_encode($chartData, 15, 512) ?>;

            <?php
                $maxVotes = \App\Models\TabelSiswa::count(); 
            ?>

            const config = {
                maxValue: <?php echo json_encode($maxVotes, 15, 512) ?>,
                barHeight: 40,
                barGap: 20,
                barColor: '#4a7abc',
                labelWidth: 50,
                chartWidth: 600
            };

            const chartContainer = document.getElementById('chart-container');

            function createChart() {
                // Pastikan chartData tidak kosong
                if (!chartData || chartData.length === 0) {
                    chartContainer.innerHTML = '<p>Tidak ada data untuk ditampilkan.</p>';
                    return;
                }

                const chartHeight = chartData.length * (config.barHeight + config.barGap);

                let svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                svg.setAttribute('width', '100%');
                svg.setAttribute('height', chartHeight);
                svg.setAttribute('viewBox', `0 0 ${config.chartWidth} ${chartHeight}`);
                svg.setAttribute('class', 'w-full');

                for (let i = 0; i <= config.maxValue; i += 1) {
                    const x = config.labelWidth + (i / config.maxValue) * (config.chartWidth - config.labelWidth);

                    // Grid line
                    let gridLine = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                    gridLine.setAttribute('x1', x);
                    gridLine.setAttribute('y1', 0);
                    gridLine.setAttribute('x2', x);
                    gridLine.setAttribute('y2', chartHeight);
                    gridLine.setAttribute('stroke', '#e5e7eb');
                    gridLine.setAttribute('stroke-dasharray', '3,3');
                    svg.appendChild(gridLine);

                    // Grid label
                    let gridLabel = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                    gridLabel.setAttribute('x', x);
                    gridLabel.setAttribute('y', chartHeight);
                    gridLabel.setAttribute('text-anchor', 'middle');
                    gridLabel.setAttribute('font-size', '12');
                    gridLabel.setAttribute('fill', '#6b7280');
                    gridLabel.textContent = i;
                    svg.appendChild(gridLabel);
                }

                // Draw bars
                chartData.forEach((item, index) => {
                    const y = index * (config.barHeight + config.barGap);
                    const barWidth = (item.value / config.maxValue) * (config.chartWidth - config.labelWidth - 10);

                    // Label
                    let labelText = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                    labelText.setAttribute('x', config.labelWidth - 10);
                    labelText.setAttribute('y', y + config.barHeight / 2 + 5);
                    labelText.setAttribute('text-anchor', 'end');
                    labelText.setAttribute('font-size', '14');
                    labelText.setAttribute('font-weight', 'bold');
                    labelText.setAttribute('fill', '#374151');
                    labelText.textContent = item.label;
                    svg.appendChild(labelText);

                    // Bar
                    let bar = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
                    bar.setAttribute('x', config.labelWidth);
                    bar.setAttribute('y', y);
                    bar.setAttribute('width', barWidth);
                    bar.setAttribute('height', config.barHeight);
                    bar.setAttribute('fill', config.barColor);
                    bar.setAttribute('rx', '2');
                    svg.appendChild(bar);

                    // Value label
                    let valueText = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                    valueText.setAttribute('x', config.labelWidth + barWidth + 5);
                    valueText.setAttribute('y', y + config.barHeight / 2 + 5);
                    valueText.setAttribute('font-size', '14');
                    valueText.setAttribute('fill', '#000000');
                    valueText.textContent = item.value;
                    svg.appendChild(valueText);
                });

                // Add chart to container
                chartContainer.appendChild(svg);
            }

            // Initialize chart
            createChart();

            // Make chart responsive
            window.addEventListener('resize', function() {
                // Clear container and redraw chart
                chartContainer.innerHTML = '';
                createChart();
            });
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f7b3c69a858611a4ccc5f2ea9729c12)): ?>
<?php $attributes = $__attributesOriginal1f7b3c69a858611a4ccc5f2ea9729c12; ?>
<?php unset($__attributesOriginal1f7b3c69a858611a4ccc5f2ea9729c12); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f7b3c69a858611a4ccc5f2ea9729c12)): ?>
<?php $component = $__componentOriginal1f7b3c69a858611a4ccc5f2ea9729c12; ?>
<?php unset($__componentOriginal1f7b3c69a858611a4ccc5f2ea9729c12); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\pemilihan_osisfix\resources\views/admin/QuickCount/index.blade.php ENDPATH**/ ?>