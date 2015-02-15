<div class="wrap">
    <h2>Volunteer Submissions <a href="<?php echo VF_EXPORT_URL; ?>" class="add-new-h2">Download Spreadsheet</a></h2>
    <table class="wp-list-table widefat fixed posts">
    <thead>
      <tr>
        <td>Name</td>
        <td>Address</td>
        <td>Suburb</td>
        <td>Postcode</td>
        <td>Branch</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Assist</td>
      </tr>
    </thead>
    <tbody id="the-list">
      <?php foreach($volunteers as $v) { ?>
        <tr class="post-1 type-post status-publish format-standard hentry category-uncategorized alternate iedit author-self level-0">
          <td class="post-title page-title column-title"><?php echo $v->firstname ?> <?php echo $v->surname ?></td>
          <td><?php echo $v->address1 ?> <br> <?php echo $v->address2 ?></td>
          <td><?php echo $v->suburb ?></td>
          <td><?php echo $v->postcode ?></td>
          <td><?php echo $v->branch ?></td>
          <td><?php echo $v->email ?></td>
          <td><?php echo $v->phone_h ?></td>
          <td><?php echo $v->assist ?></td>
        </tr>
      <?php } ?>
    </tbody>
    </table>
</div>

