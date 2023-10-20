// jQuery(document).ready(function ($) {
//   $('.selectit input[type="checkbox"]').each(function () {
//     var checkbox = $(this);
//     var radio = $('<input type="radio">').attr({
//       name: checkbox.attr('name'),
//       value: checkbox.val(),
//       checked: checkbox.prop('checked')
//     });
//     checkbox.replaceWith(radio);
//   });
// });

jQuery(document).ready(function ($) {
  // Manipular a alteração do checkbox
  $(document).on('change', '.materia-destaque-checkbox', function () {
    var btnAlterar = $('.btn-materia-destaque');
    btnAlterar.removeClass('btn-secondary');
    btnAlterar.addClass('btn-warning');

    $('.btn-materia-destaque').text('Alterar');
    $('.btn-materia-destaque').removeAttr('disabled');
  });
});

jQuery(document).ready(function ($) {
  // Manipular a alteração do checkbox
  $(document).on('change', '.materia-destaque-checkbox', function () {
    // Verifique se o estado do $(this) foi modificado
    if (!$(this).is(':checked')) {
      var confirmDesmarcar = confirm('Você realmente deseja desmarcar este Campo?');
      if (!confirmDesmarcar) {
        // Se o usuário cancelar, restaure o estado original do $(this)
        $(this).prop('checked', true);

        var btnAlterar = $('.btn-materia-destaque');
        btnAlterar.addClass('btn-secondary');
        btnAlterar.removeClass('btn-warning');

        $('.btn-materia-destaque').text('Alterado');
        $('.btn-materia-destaque').prop('disabled', true);

        return;
      }
    }
  });
});

jQuery(document).ready(function ($) {
  // Manipular a alteração do checkbox
  $('#botao-alterar-materia-destaque').on('click', function () {
    var updatedData = [];
    $('.materia-destaque-checkbox').each(function () {
      var post_id = $(this).data('post-id');
      var is_destaque = $(this).is(':checked') ? '1' : '0';
      updatedData.push({ post_id: post_id, is_destaque: is_destaque });
    });

    // Enviar o status atualizado via AJAX para a função PHP
    $.ajax({
      url: ajaxurl,
      type: 'POST',
      data: {
        action: 'update_featured_news',
        post_data: updatedData
      },
      beforeSend: function () {
        // Exibir um indicador de carregamento
        $(this).parent().append('<span class="materia-destaque-loading">Aguarde...</span>');
      },
      success: function () {
        // Remover o indicador de carregamento após a alteração bem-sucedida
        $('.materia-destaque-loading').remove();
      },
      error: function () {
        // Exibir uma mensagem de erro em caso de falha
        alert('Ocorreu um erro ao alterar o destaque da matéria. Por favor, tente novamente.');
      }
    });
  });
});

jQuery(document).ready(function ($) {
  // Manipular a alteração do checkbox
  $(document).on('change', '.materia-destaque-checkbox', function () {
    var checkboxes = $('.materia-destaque-checkbox');
    var selectedCheckboxes = checkboxes.filter(':checked');

    if (selectedCheckboxes.length >= 3) {
      checkboxes.not(':checked').prop('disabled', true);
    } else {
      checkboxes.prop('disabled', false);
    }

    var mensagemLimite = $('#mensagem-limite-destaque');
    if (selectedCheckboxes.length >= 3) {
      mensagemLimite.text('Você atingiu o limite máximo de matérias em destaque. Não é possível ter mais de 3 matérias em destaque.');
      mensagemLimite.show();
    } else {
      mensagemLimite.hide();
    }
  });
});

jQuery(document).ready(function ($) {
  // Aguarde até que a página esteja totalmente carregada
  $(window).on('load', function () {
    // Remova a propriedade CSS 'visibility: hidden' da classe .column-top_news
    $('.column-top_news').css('visibility', 'visible');
  });
});
