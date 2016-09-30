$(document).ready(function () {
    $("#pesquisar").keydown(function () {
        $.ajax({
            type: "POST",
             url: "http://localhost/codeigniterr/funcionario/getFuncNome",
            data: {
                keyword: $("#pesquisar").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownFuncionario').empty();
                    $('#DropdownFuncionario').show() ;
                    $('#pesquisar').attr("data-toggle", "dropdown");
                    $('#DropdownFuncionario').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#pesquisar').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownFuncionario').append(
                           '<li role="presentation" ><a role="menuitem dropdownnameli" class="dropdownlivalue">'
                           + value['idFunc'] +' - ' + value['nome'] + '</li>');
                });
            }
        });
        $('ul.txtfunc').on('click', 'li a', function () {
            $('#pesquisar').val($(this).text() );
            $('#DropdownFuncionario').hide() ;
            
        });
        
    });

});