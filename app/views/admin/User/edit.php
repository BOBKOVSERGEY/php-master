
<section class="content-header">
  <h1>
    Управление пользователем
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo ADMIN; ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
    <li><a href="<?php echo ADMIN; ?>/user">Список пользователей</a></li>
    <li class="active">Управление пользователем</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
          <form action="<?php echo ADMIN; ?>/user/edit" method="post" data-toggle="validator">
            <div class="box-body">
              <div class="form-group has-feedback">
                <label for="login">Логин</label>
                <input type="text" class="form-control" name="login" id="login" value="<?=$user->login;?>" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              </div>
              <div class="form-group">
                <label for="password">Пароль</label>
                <input type="text" class="form-control" name="password" id="password" placeholder="Введите пароль, если хотите его изменить">
              </div>
              <div class="form-group has-feedback">
                <label for="name">Имя</label>
                <input type="text" class="form-control" name="name" id="name" value="<?=$user->name;?>" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              </div>
              <div class="form-group has-feedback">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?=$user->email;?>" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              </div>
              <div class="form-group has-feedback">
                <label for="address">Адрес</label>
                <input type="text" class="form-control" name="address" id="address" value="<?=$user->address;?>" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              </div>
              <div class="form-group">
                <label for="role">Роль</label>
                <select name="role" id="role" class="form-control">
                  <option value="user" <?php if ($user->role == 'user') echo ' selected'; ?>>Пользователь</option>
                  <option value="admin" <?php if ($user->role == 'admin') echo ' selected'; ?>>Администратор</option>
                </select>
              </div>
              <div class="box-footer">
                <input type="hidden" name="id" value="<?=$user->id;?>">
                <button type="submit" class="btn btn-success">Редактировать</button>
              </div>
          </form>
      </div>
    </div>
    <h3>Заказы пользователя</h3>
  </div>
</section>
