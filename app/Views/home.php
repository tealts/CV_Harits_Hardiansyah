<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Profile Card -->
<div class="row justify-content-center mb-4">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body p-5">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        <img src="<?= base_url('assets/images/' . ($biodata['gambar'] ?? 'CV.jpg')) ?>" 
                             alt="Profile Photo" 
                             class="img-fluid rounded-circle"
                             style="width: 200px; height: 200px; object-fit: cover; border: 5px solid #667eea;"
                             onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($biodata['nama_lengkap']) ?>&size=200&background=667eea&color=fff'">
                    </div>
                    <div class="col-md-8">
                        <h1 class="mb-3" style="color: #667eea; font-weight: 700;">
                            <?= esc($biodata['nama_lengkap']) ?>
                        </h1>
                        <p class="lead mb-3"><?= esc($biodata['tentang_saya']) ?></p>
                        
                        <div class="mb-3">
                            <p class="mb-2"><i class="fas fa-map-marker-alt text-primary me-2"></i> <?= esc($biodata['alamat']) ?></p>
                            <p class="mb-2"><i class="fas fa-phone text-success me-2"></i> <?= esc($biodata['telepon']) ?></p>
                            <p class="mb-2"><i class="fas fa-envelope text-danger me-2"></i> <?= esc($biodata['email']) ?></p>
                            <p class="mb-2"><i class="fas fa-birthday-cake text-warning me-2"></i> 
                                <?= esc($biodata['tempat_lahir']) ?>, <?= date('d F Y', strtotime($biodata['tanggal_lahir'])) ?>
                            </p>
                        </div>
                        
                        <div class="mt-4">
                            <?php if ($biodata['linkedin']): ?>
                                <a href="<?= esc($biodata['linkedin']) ?>" target="_blank" class="btn btn-primary me-2">
                                    <i class="fab fa-linkedin"></i> LinkedIn
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($biodata['github']): ?>
                                <a href="<?= esc($biodata['github']) ?>" target="_blank" class="btn btn-dark me-2">
                                    <i class="fab fa-github"></i> GitHub
                                </a>
                            <?php endif; ?>
                            
                            <?php if ($biodata['instagram']): ?>
                                <a href="<?= esc($biodata['instagram']) ?>" target="_blank" class="btn btn-danger">
                                    <i class="fab fa-instagram"></i> Instagram
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Summary -->
<div class="row">
    <!-- Pendidikan Summary -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h3 class="card-title mb-4" style="color: #667eea;">
                    <i class="fas fa-graduation-cap"></i> Pendidikan Terakhir
                </h3>
                <?php if (!empty($pendidikan)): ?>
                    <?php $lastPendidikan = $pendidikan[0]; ?>
                    <h5 class="mb-2"><?= esc($lastPendidikan['institusi']) ?></h5>
                    <p class="text-muted mb-2"><?= esc($lastPendidikan['jenjang']) ?> - <?= esc($lastPendidikan['jurusan']) ?></p>
                    <p class="mb-2"><strong>Tahun:</strong> <?= $lastPendidikan['tahun_mulai'] ?> - <?= $lastPendidikan['tahun_selesai'] ?></p>
                    <?php if ($lastPendidikan['ipk']): ?>
                        <p class="mb-0"><strong>IPK:</strong> <?= $lastPendidikan['ipk'] ?></p>
                    <?php endif; ?>
                    <a href="<?= base_url('pendidikan') ?>" class="btn btn-outline-primary mt-3">
                        Lihat Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                <?php else: ?>
                    <p class="text-muted">Belum ada data pendidikan.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Pengalaman Summary -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h3 class="card-title mb-4" style="color: #667eea;">
                    <i class="fas fa-briefcase"></i> Pengalaman Terbaru
                </h3>
                <?php if (!empty($pengalaman)): ?>
                    <?php $lastPengalaman = $pengalaman[0]; ?>
                    <span class="badge bg-primary mb-2"><?= esc($lastPengalaman['jenis']) ?></span>
                    <h5 class="mb-2"><?= esc($lastPengalaman['posisi']) ?></h5>
                    <p class="text-muted mb-2"><?= esc($lastPengalaman['nama_tempat']) ?></p>
                    <p class="mb-2"><strong>Periode:</strong> <?= $lastPengalaman['tahun_mulai'] ?> - <?= $lastPengalaman['tahun_selesai'] ?></p>
                    <a href="<?= base_url('pengalaman') ?>" class="btn btn-outline-primary mt-3">
                        Lihat Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                <?php else: ?>
                    <p class="text-muted">Belum ada data pengalaman.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Skills Summary -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title mb-4" style="color: #667eea;">
                    <i class="fas fa-code"></i> Top Skills
                </h3>
                <div class="row">
                    <?php 
                    $topSkills = array_slice($keahlian, 0, 6); 
                    foreach ($topSkills as $skill): 
                    ?>
                        <div class="col-md-4 mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span><strong><?= esc($skill['nama_skill']) ?></strong></span>
                                <span class="text-muted"><?= $skill['persentase'] ?>%</span>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" 
                                     style="width: <?= $skill['persentase'] ?>%; background-color: #667eea;" 
                                     aria-valuenow="<?= $skill['persentase'] ?>" 
                                     aria-valuemin="0" 
                                     aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a href="<?= base_url('keahlian') ?>" class="btn btn-outline-primary mt-3">
                    Lihat Semua Keahlian <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>