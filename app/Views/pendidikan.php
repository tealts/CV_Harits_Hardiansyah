<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body p-5">
                <h2 class="mb-4 text-center" style="color: #667eea; font-weight: 700;">
                    <i class="fas fa-graduation-cap"></i> Riwayat Pendidikan
                </h2>
                
                <?php if (!empty($pendidikan)): ?>
                    <div class="timeline">
                        <?php foreach ($pendidikan as $index => $pend): ?>
                            <div class="timeline-item mb-4">
                                <div class="row">
                                    <div class="col-md-3 text-md-end">
                                        <h5 style="color: #667eea;">
                                            <?= $pend['tahun_mulai'] ?> - <?= $pend['tahun_selesai'] ?>
                                        </h5>
                                        <span class="badge bg-primary"><?= esc($pend['jenjang']) ?></span>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <div style="width: 20px; height: 20px; background: #667eea; border-radius: 50%; margin: 0 auto;"></div>
                                        <?php if ($index < count($pendidikan) - 1): ?>
                                            <div style="width: 2px; height: 100%; background: #ddd; margin: 5px auto;"></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h4 class="card-title mb-2"><?= esc($pend['institusi']) ?></h4>
                                                <p class="text-muted mb-2">
                                                    <i class="fas fa-book me-2"></i><?= esc($pend['jurusan']) ?>
                                                </p>
                                                <?php if ($pend['ipk']): ?>
                                                    <p class="mb-2">
                                                        <i class="fas fa-star text-warning me-2"></i>
                                                        <strong>IPK:</strong> <?= $pend['ipk'] ?>
                                                    </p>
                                                <?php endif; ?>
                                                <?php if ($pend['deskripsi']): ?>
                                                    <p class="mb-0"><?= esc($pend['deskripsi']) ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle"></i> Belum ada data pendidikan.
                    </div>
                <?php endif; ?>
                
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