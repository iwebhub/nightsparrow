<div class="cont">
  <div class="more"><a href="?export=html"><button class="more-themes">Prikaži sirove podatke</button></a><a href="?export=csv"><button class="more-themes">Preuzmi kao CSV datoteku</button></a></div>
  <p class="input-desc">Analitika</p>
  <input type="text" name="name" value="" id="search" class="search" placeholder="Analitika za..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Analitika za...'" title="danas, jučer, 7 dana...">
  <div class="analytics-wrapper ">
    <div class="single s-u">
      <h1><?php if (isset($data)) {
          echo $data['numberOfVisitsEver'];
        } ?></h1>
      <p class="key">ikad</p>
    </div>
    <div class="single s-u">
      <h1><?php if (isset($data)) {
          echo $data['lastMonthVisits'];
        } ?></h1>
      <p class="key">posljednjih 30 dana</p>
    </div>
    <div class="single s-u">
      <h1><?php if (isset($data)) {
          echo $data['lastDayVisits'];
        } ?></h1>
      <p class="key">posljednja 24 sata</p>
    </div>

    <div class="single-list">
      <h3>Najposjećenije ikad</h3>
      <?php if (isset($data)) {
        foreach ($data['uriMapMostVisitsEver'] as $visit) {
          echo '<p class="row"><a href="' . $visit['uri'] . '">'.$visit['uri'].'</a> <span>'.$visit['COUNT(*)'].' pregleda</span></p>';
        }
      } ?>

    </div>
    <div class="single-list">
      <h3>Najposjećenije u posljednja 24 sata</h3>
      <?php if (isset($data)) {
        foreach ($data['uriMapMostVisitsDay'] as $visit) {
          echo '<p class="row"><a href="' . $visit['uri'] . '">'.$visit['uri'].'</a> <span>'.$visit['COUNT(*)'].' pregleda</span></p>';
        }
      } ?>

    </div>
  </div>
</div>
