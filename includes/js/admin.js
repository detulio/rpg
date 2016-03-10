$( document ).ready(function(){
    $("#grid").bootgrid({
        selection: true,
        formatters: {
            "link": function(column, row)
            {
                return "<a href='DeletarLutador/"+row.id+"'>[Excluir]</a>";
            }
        }
    }).on("selected.rs.jquery.bootgrid", function(e, rows)
    {
        var rowIds = [];
        for (var i = 0; i < rows.length; i++)
        {
            $("#id").val(rows[i].id);
            $("#nome").val(rows[i].nome);
            $("#raca").val(rows[i].raca);
            rowIds.push(rows[i].sender);
        }
    });

    $('input:reset').click(function(){
        $("#id").val('');
    });
});