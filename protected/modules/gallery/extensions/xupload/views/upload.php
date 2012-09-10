<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    {% input=file.name; %}
    {% file.onlyname = input.substr(0, input.lastIndexOf('.')) || input; %}

    <tr class="template-upload fade" rowspan="10">
        <td class="preview"><span class="fade"></span></td>
        <td class="name" colspan="2">
            <label><?php echo Yii::t('app', 'Title'); ?>:</label>
            <input type="text" name="title[{%=file.size+file.name%}]" title="Name of the image" value="{%=file.onlyname%}" />
        </td>
        <td class="image-description" colspan="3">
            <label>Description</label>
            <textarea name="description[{%=file.size+file.name%}]" />
        </td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
        <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
        <td>
            <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
        </td>

        <td class="start">{% if (!o.options.autoUpload) { %}
            <button class="btn btn-primary">
                <i class="icon-upload icon-white"></i>
                <span>{%=locale.fileupload.start%}</span>
            </button>
            {% } %}</td>
        {% } else { %}
        <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>{%=locale.fileupload.cancel%}</span>
            </button>

            {% } %}</td>


    </tr>
    {% } %}
</script>
<script type="text/javascript">
    $('#Image-form').bind('fileuploadsubmit', function (e, data) {
        console.log('wohoo');
        var inputs = data.context.find(':input');
        data.formData = inputs.serializeArray();
    });
</script>