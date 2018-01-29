<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

			<li class="active">直播后台控制台</li>
			<li class="active">分类管理</li>
            <li class="active">分类列表</li>
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
								<th>编号</th>
								<th>交易日期</th>
								<th>礼物金额</th>
								<th>礼物图片</th>
								<th>礼物操作</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($data as $k => $v): ?>
								<tr>
									<td class="center">
										<label>
											<input type="checkbox" class="ace" />
											<span class="lbl"></span>
										</label>
									</td>

									<td><?=$v['id'] ?></td>
									<td><?=$v['name'] ?></td>
									<td><?=$v['money'] ?></td>
									<td>
										<a href="/upload/<?=$v['img'] ?>"><img src="/upload/<?=$v['img'] ?>" width="5%" alt=""></a>
									</td>
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
