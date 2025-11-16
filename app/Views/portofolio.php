<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body p-5">
                <h2 class="mb-4 text-center" style="color: #667eea; font-weight: 700;">
                    <i class="fas fa-folder-open"></i> Portofolio & Karya
                </h2>
                
                <?php if (!empty($portofolio)): ?>
                    <div class="row">
                        <?php foreach ($portofolio as $porto): ?>
                            <div class="col-md-6 mb-4">
                                <div class="card shadow-sm h-100">
                                    
                                    <?php if ($porto['gambar']): ?> 
                                        <img src="<?= base_url('assets/images/' . $porto['gambar']) ?>" 
                                            class="card-img-top" 
                                            alt="<?= esc($porto['judul']) ?>"
                                            style="height: 200px; object-fit: cover;"
                                            onerror="this.src='https://via.placeholder.com/400x200?text=<?= urlencode($porto['judul']) ?>'">
                                    <?php else: ?>
                                        <div style="height: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-project-diagram fa-5x text-white" style="opacity: 0.5;"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= esc($porto['judul']) ?></h5>
                                        <p class="card-text"><?= esc($porto['deskripsi']) ?></p>
                                        
                                        <div class="mb-3">
                                            <strong><i class="fas fa-tools me-2"></i>Teknologi:</strong>
                                            <br>
                                            <?php 
                                            $teknologi = explode(',', $porto['teknologi']);
                                            foreach ($teknologi as $tek): 
                                            ?>
                                                <span class="badge bg-secondary me-1 mb-1"><?= trim(esc($tek)) ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                        
                                        <?php if ($porto['tanggal_selesai']): ?>
                                            <p class="text-muted mb-3">
                                                <i class="fas fa-calendar-check me-2"></i>
                                                Selesai: <?= date('d F Y', strtotime($porto['tanggal_selesai'])) ?>
                                            </p>
                                        <?php endif; ?>
                                        
                                        <div class="d-grid gap-2">
                                            <?php if ($porto['link_demo']): ?>
                                                <a href="<?= esc($porto['link_demo']) ?>" target="_blank" class="btn btn-primary">
                                                    <i class="fas fa-external-link-alt"></i> Live Demo
                                                </a>
                                            <?php endif; ?>
                                            
                                            <?php if ($porto['link_github']): ?>
                                                <a href="<?= esc($porto['link_github']) ?>" target="_blank" class="btn btn-dark">
                                                    <i class="fab fa-github"></i> Source Code
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle"></i> Belum ada data portofolio.
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