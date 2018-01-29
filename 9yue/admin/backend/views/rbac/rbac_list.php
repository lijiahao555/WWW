<?php

?>

			<li class="active">直播后台控制台</li>
			<li class="active">角色管理</li>
            <li class="active">角色列表</li>
		</ul><!-- .breadcrumb -->

		<div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <i class="icon-search nav-search-icon"></i>
                </span>
            </form>
        </div><!-- #nav-search -->
    </div>

    <div class="page-content">

        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">
                                    <label>
                                        <input type="checkbox" class="ace" />
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th>角色</th>
                                <th>角色</th>
                                <th>权限路径</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data as $key => $v): ?>
                                <tr>
                                    <td></td>
                                    <td><?=$v['parent']; ?></td>
                                    <td><?=$v['child']; ?></td>
                                    <td>
                                        <a href="">修改</a>
                                        <a href="">删除</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /span -->
        </div><!-- /row -->
    </div><!-- /.page-content -->


        <div>
            <table border="1" >
            </table>
        </div>


