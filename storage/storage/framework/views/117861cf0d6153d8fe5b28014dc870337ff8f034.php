<?php $__env->startSection('title'); ?>
    <?php echo e(__('Accepted tasks by users')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <li> <?php echo e(__('Accepted tasks by users')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">
            <!-- tile -->
            <section class="tile">
                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><?php echo e(__('Accepted tasks by users')); ?></h1>
                    <ul class="controls">
                        
                        
                        
                        
                        
                        <li>
                            <a role="button" class="tile-fullscreen">
                                <i class="fa fa-expand"></i> <?php echo e(__('Fullscreen')); ?>

                            </a>
                        </li>

                    </ul>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">

                    <table id="events" class="table hover form-inline dt-bootstrap no-footer">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Task')); ?></th>
                            <th><?php echo e(__('Active')); ?></th>
                            <th><?php echo e(__('Start date')); ?></th>
                            <th><?php echo e(__('Deadline')); ?></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td class="tdinput"></td>
                            <td class="tdinput"></td>
                            <td class="tdinput"></td>
                            <td class="tdinput"></td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /tile body -->

            </section>
            <!-- /tile -->
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('load-scripts'); ?>
    <script>
        //initialize basic datatable
        var table = $('#events').width('100%').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '<?php echo e(route('admin.user-tasks.accepted_tasks.datatable')); ?>',
            "columns": [
                {
                    "data": 'task', "orderable": false, "searchable": false, "render": function (data, type, row, meta) {
                        return '<a href="/admin/user-tasks/tasks/' + row['task_id'] + '/edit" class="btn btn-xs btn-primary" target="_blank"><i class="glyphicon glyphicon-edit"></i> <?php echo e(__('task details')); ?></a>';
                    }
                },
                {
                    "data": 'active', "orderable": false, "searchable": false, "render": function (data, type, row, meta) {
                        if (row['active'] == 1) {
                            return "<?php echo e(__('yes')); ?>";
                        } else {
                            return "<?php echo e(__('no')); ?>";
                        }
                    }
                },
                {"data": "start_datetime", "name": "user_tasks.start_datetime"},
                {"data": "end_datetime", "name": "user_tasks.end_datetime"},
            ],
            "dom": 'Rlfrtip',
            initComplete: function () {
                this.api().columns([0, 1, 2, 3]).every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                        .on('keyup', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        });

        $('#events tbody').on('click', 'tr', function () {
            if ($(this).hasClass('row_selected')) {
                $(this).removeClass('row_selected');
            } else {
                table.$('tr.row_selected').removeClass('row_selected');
                $(this).addClass('row_selected');
            }
        });
        //*initialize basic datatable
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin/layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>