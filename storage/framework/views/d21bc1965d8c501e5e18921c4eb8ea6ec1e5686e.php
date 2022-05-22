<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Damier</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="<?php echo e(mix('css/app.css')); ?>" type="text/css" media="all" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h2>Damier</h2>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <form action="" method="post">
                            	<?php echo csrf_field(); ?>
								<div class="form-group mb-3">
									<label for="exampleInputEmail1">Ligne</label> <input type="number" class="form-control" name="line" required="required" value="<?php echo e(!empty($line) ? $line : ''); ?>">
								</div>
								<div class="form-group mb-3">
									<label for="exampleInputPassword1">Colonne</label> <input type="number" class="form-control" name="column" required="required" value="<?php echo e(!empty($column) ? $column : ''); ?>">
								</div>
								<button type="submit" class="btn btn-primary">OK</button>
							</form>
                        </div>

						<?php if(!empty($line) && !empty($column)): ?>
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <table class="damier-table" id="myTable">
                                    	<?php for($i = 0; $i <= $line; $i++): ?>
                                    	<tr>
                                    		<?php for($j = 0; $j <= $column; $j++): ?>
                                    		<td>
                                    			<div class="<?php echo e(($i + $j) % 2 == 0 ? 'black' : 'white'); ?>"></div>
                                    		</td>
                                    		<?php endfor; ?>
                                    	</tr>
										<?php endfor; ?>
                                    </table>
                                    <a class="btn btn-primary mt-4" id="btn-export">Export as PNG</a>
                                    <a href="#" id="download"></a>
                                </div>
                            </div>
                        </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo e(mix('js/app.js')); ?>"></script>
        <script type="text/javascript">
        $(function(){
        	$('#btn-export').on('click', function(){
				html2canvas(document.getElementById("myTable")).then(function(canvas) {
					var img = canvas.toDataURL('image/png');
					var newData = img.replace(/^data:image\/png/, 'data:application/octet-stream');
    				$('#download').attr('download', 'damier.png').attr('href', newData);
					$('#download')[0].click();
                });
        	});
        })
        </script>
    </body>
</html>
<?php /**PATH /var/www/html/resources/views/welcome.blade.php ENDPATH**/ ?>