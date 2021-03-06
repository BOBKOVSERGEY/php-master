
<section class="content-header">
  <h1>
    Новая категория
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo ADMIN; ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
    <li><a href="<?php echo ADMIN; ?>/category">Список категорий</a></li>
    <li class="active">Новая категория</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <form action="<?php echo ADMIN; ?>/category/add" method="post" data-toggle="validator">
          <div class="box-body">
            <div class="form-group has-feedback">
              <label for="title">Наименование категории</label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Наименование категории" required>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group">
              <label for="parent_id">Родительская категория</label>
              <?php new \app\widgets\menu\Menu([
          'tpl' => WWW. '/menu/select.php',
          'container' => 'select',
          'cache' => 0,
          'cacheKey' => 'admin_select',
          'attrs' => [
            'name' => 'parent_id',
            'id' => 'parent_id'
          ],
          'class' => 'form-control',
          'prepend' => '<option value="0">Самостоятельная категория</option>'
        ]);?>
            </div>
            <div class="form-group">
              <label for="keywords">Ключевые слова</label>
              <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Ключевые слова" >
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="form-group">
              <label for="description">Описание категории</label>
              <input type="text" name="description" id="description" class="form-control" placeholder="Описание категории" >
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Добавить</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
