<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Solar Center</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ mix('css/app.css') }}" type="text/css" media="all" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <h2>Tree view</h2>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <form action="" method="post" enctype="multipart/form-data">
                            	@csrf
								<div class="mb-3">
                                  <label for="formFile" class="form-label">Import JSON file</label>
                                  <input class="form-control" type="file" name="json" accept=".json" required="required">
                                </div>
								<button type="submit" class="btn btn-primary">OK</button>
							</form>
                        </div>
                        @if (!empty($file))
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            
                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm" id="json"></div>
                            </div>
                        </div>
						@endif
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        @if (!empty($file))
        <script type="text/javascript">
        $(function(){
        	$('#json').jstree({
        		'core' : {
        			'data' : {
        				"url" : "json/{{ $file }}",
        				"dataType" : "json" // needed only if you do not supply JSON headers
        			}
        		}
        	});
        })
        </script>
        @endif
    </body>
</html>
