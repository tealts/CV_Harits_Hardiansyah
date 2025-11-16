<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body p-5">
                <h2 class="mb-4 text-center" style="color: #667eea; font-weight: 700;">
                    <i class="fas fa-code"></i> Keahlian & Skills
                </h2>
                
                <?php if (!empty($keahlian)): ?>
                    <?php 
                    // Grouping by category
                    $kategoris = [];
                    foreach ($keahlian as $skill) {
                        $kategoris[$skill['kategori']][] = $skill;
                    }
                    ?>
                    
                    <?php foreach ($kategoris as $kategori => $skills): ?>
                        <div class="mb-5">
                            <h4 class="mb-4" style="color: #667eea;">
                                <i class="fas fa-folder me-2"></i><?= esc($kategori) ?>
                            </h4>
                            <div class="row">
                                <?php foreach ($skills as $skill): ?>
                                    <div class="col-md-6 mb-4">
                                        <div class="card shadow-sm h-100">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <h5 class="mb-0"><?= esc($skill['nama_skill']) ?></h5>
                                                    <span class="badge 
                                                        <?php 
                                                        echo $skill['level'] == 'Expert' ? 'bg-success' : 
                                                             ($skill['level'] == 'Advanced' ? 'bg-primary' : 
                                                             ($skill['level'] == 'Intermediate' ? 'bg-info' : 'bg-secondary'));
                                                        ?>">
                                                        <?= esc($skill['level']) ?>
                                                    </span>
                                                </div>
                                                <div class="progress" style="height: 20px;">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" 
                                                         role="progressbar" 
                                                         style="width: <?= $skill['persentase'] ?>%; background-color: #667eea;" 
                                                         aria-valuenow="<?= $skill['persentase'] ?>" 
                                                         aria-valuemin="0" 
                                                         aria-valuemax="100">
                                                        <?= $skill['persentase'] ?>%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle"></i> Belum ada data keahlian.
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