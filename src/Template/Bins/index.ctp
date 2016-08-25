<h1>Next Bin day: <?= $binDay['label']?></h1>

<ul>
<?= $binDay->isBrown() ? '<li>Big Brown Bin</li>' : '' ?>
<?= $binDay->isGrey() ? '<li>Grey Bin</li>' : '' ?>
<?= $binDay->isBlue() ? '<li>Blue Bin</li>' : '' ?>
<?= $binDay->isCard() ? '<li>Card Bin</li>' : '' ?>
</ul>
