<div class="flex mb-4" x-data="picturePreview()">
    <div class="mr-3">
        <img
             id="preview"
             src="<?php echo e(isset(Auth::user()->imagecheck_path) ? asset('storage/' . Auth::user()->imagecheck_path) : asset('images/user_icon.png')); ?>"
             alt=""
             class="w-16 h-16 rounded-full object-cover border-none bg-gray-200">
    </div>
    <div class="flex items-center gap-4">
        <button
                x-on:click="document.getElementById('image').click()"
                type="button"
                class="inline-flex items-center uppercase rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            画像を選ぶ
        </button>
        <input @change="showPreview(event)" type="file" name="image" id="image" class="hidden">
        <script>
            function picturePreview() {
                return {
                    showPreview: (event) =>{
                        if(event.target.files.length > 0){
                            var src = URL.createObjectURL(event.target.files[0]);
                            document.getElementById('preview').src = src;
                        }
                    }
                }
             }
        </script>
    </div>
</div>
<?php /**PATH /Applications/MAMP/htdocs/laravel/resources/views/components/imagecheck.blade.php ENDPATH**/ ?>