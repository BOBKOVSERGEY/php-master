
<section class="content-header">
  <h1>
    Очистка кеша
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo ADMIN; ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
    <li class="active">Очистка кеша</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Действия</th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Кэш категорий</td>
                  <td>Меню категорий на сайте. Кэшируется на 1 час</td>
                  <td>
                    <a href="<?=ADMIN;?>/cache/delete?key=category" class="text-danger delete"><i class="fa fa-fw fa-close"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Кэш фильтров</td>
                  <td>Кеш фильтров и групп фильтров. Кэшируется на 1 час</td>
                  <td>
                    <a href="<?=ADMIN;?>/cache/delete?key=filter" class="text-danger delete"><i class="fa fa-fw fa-close"></i></a>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
