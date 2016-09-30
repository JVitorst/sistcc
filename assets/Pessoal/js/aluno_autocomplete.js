$(document).ready(function () {
    $("#pesquisar").keydown(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/codeigniterr/aluno/GetAlunoNome",
            data: {
                keyword: $("#pesquisar").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownAluno').empty();
                    $('#DropdownAluno').show() ;
                    $('#pesquisar').attr("data-toggle", "dropdown");
                    $('#DropdownAluno').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#pesquisar').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownAluno').append(
                           '<li role="presentation" ><a role="menuitem dropdownnameli" class="dropdownlivalue">'
                           + value['idAluno'] +' - ' + value['nome'] + '</li>');
                });
            }
        });
        $('ul.txtaluno').on('click', 'li a', function () {
            $('#pesquisar').val($(this).text() );
            $('#DropdownAluno').hide() ;
            
        });
        
    });

});