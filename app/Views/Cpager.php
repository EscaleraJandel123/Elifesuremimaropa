<div class="pagination-area">
    <?php if ($pager->hasPreviousPage()) : ?>
        <a href="<?= $pager->getPreviousPage() ?>" class="prev page-numbers">
            <i class="bx bx-chevron-left"></i>
        </a>
    <?php endif ?>

    <?php foreach ($pager->links() as $link): ?>
        <a href="<?= $link['uri'] ?>" class="page-numbers <?= $link['active'] ? 'current' : '' ?>">
            <?= $link['title'] ?>
        </a>
    <?php endforeach ?>

    <?php if ($pager->hasNextPage()) : ?>
        <a href="<?= $pager->getNextPage() ?>" class="next page-numbers">
            <i class="bx bx-chevron-right"></i>
        </a>
    <?php endif ?>
</div>
