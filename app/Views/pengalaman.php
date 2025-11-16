<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body p-5">
                <h2 class="mb-4 text-center" style="color: #667eea; font-weight: 700;">
                    <i class="fas fa-briefcase"></i> Pengalaman
                </h2>
                
                <!-- Filter Tabs -->
                <ul class="nav nav-pills mb-4 justify-content-center" id="pengalamanTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="semua-tab" data-bs-toggle="pill" data-bs-target="#semua" type="button">
                            Semua
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="organisasi-tab" data-bs-toggle="pill" data-bs-target="#organisasi" type="button">
                            Organisasi
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="magang-tab" data-bs-toggle="pill" data-bs-target="#magang" type="button">
                            Magang
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pekerjaan-tab" data-bs-toggle="pill" data-bs-target="#pekerjaan" type="button">
                            Pekerjaan
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="proyek-tab" data-bs-toggle="pill" data-bs-target="#proyek" type="button">
                            Proyek
                        </button>
                    </li>
                </ul>
                
                <!-- Tab Content -->
                <div class="tab-content" id="pengalamanTabContent">
                    <!-- Semua -->
                    <div class="tab-pane fade show active" id="semua" role="tabpanel">
                        <?php if (!empty($pengalaman)): ?>
                            <?php foreach ($pengalaman as $index => $peng): ?>
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <span class="badge bg-primary mb-2"><?= esc($peng['jenis']) ?></span>
                                                <h4 class="card-title mb-2"><?= esc($peng['posisi']) ?></h4>
                                                <p class="text-muted mb-2">
                                                    <i class="fas fa-building me-2"></i><?= esc($peng['nama_tempat']) ?>
                                                </p>
                                                <p class="mb-2">
                                                    <i class="fas fa-calendar-alt me-2"></i>
                                                    <?= $peng['tahun_mulai'] ?> - <?= $peng['tahun_selesai'] ?>
                                                </p>
                                                <p class="mb-0"><?= esc($peng['deskripsi']) ?></p>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <i class="fas fa-briefcase fa-4x" style="color: #667eea; opacity: 0.3;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle"></i> Belum ada data pengalaman.
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Organisasi -->
                    <div class="tab-pane fade" id="organisasi" role="tabpanel">
                        <?php 
                        $organisasi = array_filter($pengalaman, function($p) { return $p['jenis'] == 'Organisasi'; });
                        if (!empty($organisasi)): 
                        ?>
                            <?php foreach ($organisasi as $peng): ?>
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <h4 class="card-title mb-2"><?= esc($peng['posisi']) ?></h4>
                                        <p class="text-muted mb-2">
                                            <i class="fas fa-users me-2"></i><?= esc($peng['nama_tempat']) ?>
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            <?= $peng['tahun_mulai'] ?> - <?= $peng['tahun_selesai'] ?>
                                        </p>
                                        <p class="mb-0"><?= esc($peng['deskripsi']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle"></i> Belum ada data organisasi.
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Magang -->
                    <div class="tab-pane fade" id="magang" role="tabpanel">
                        <?php 
                        $magang = array_filter($pengalaman, function($p) { return $p['jenis'] == 'Magang'; });
                        if (!empty($magang)): 
                        ?>
                            <?php foreach ($magang as $peng): ?>
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <h4 class="card-title mb-2"><?= esc($peng['posisi']) ?></h4>
                                        <p class="text-muted mb-2">
                                            <i class="fas fa-building me-2"></i><?= esc($peng['nama_tempat']) ?>
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            <?= $peng['tahun_mulai'] ?> - <?= $peng['tahun_selesai'] ?>
                                        </p>
                                        <p class="mb-0"><?= esc($peng['deskripsi']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle"></i> Belum ada data magang.
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Pekerjaan -->
                    <div class="tab-pane fade" id="pekerjaan" role="tabpanel">
                        <?php 
                        $pekerjaan = array_filter($pengalaman, function($p) { return $p['jenis'] == 'Pekerjaan'; });
                        if (!empty($pekerjaan)): 
                        ?>
                            <?php foreach ($pekerjaan as $peng): ?>
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <h4 class="card-title mb-2"><?= esc($peng['posisi']) ?></h4>
                                        <p class="text-muted mb-2">
                                            <i class="fas fa-building me-2"></i><?= esc($peng['nama_tempat']) ?>
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            <?= $peng['tahun_mulai'] ?> - <?= $peng['tahun_selesai'] ?>
                                        </p>
                                        <p class="mb-0"><?= esc($peng['deskripsi']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle"></i> Belum ada data pekerjaan.
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Proyek -->
                    <div class="tab-pane fade" id="proyek" role="tabpanel">
                        <?php 
                        $proyek = array_filter($pengalaman, function($p) { return $p['jenis'] == 'Proyek'; });
                        if (!empty($proyek)): 
                        ?>
                            <?php foreach ($proyek as $peng): ?>
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <h4 class="card-title mb-2"><?= esc($peng['posisi']) ?></h4>
                                        <p class="text-muted mb-2">
                                            <i class="fas fa-project-diagram me-2"></i><?= esc($peng['nama_tempat']) ?>
                                        </p>
                                        <p class="mb-2">
                                            <i class="fas fa-calendar-alt me-2"></i>
                                            <?= $peng['tahun_mulai'] ?> - <?= $peng['tahun_selesai'] ?>
                                        </p>
                                        <p class="mb-0"><?= esc($peng['deskripsi']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle"></i> Belum ada data proyek.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>