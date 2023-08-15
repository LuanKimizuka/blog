<?php
    require_once '../includes/funcoes.php';
    require_once '../core/conexao_mysq.php';
    require_once '../core/sql.php';
    require_once '../core/mysq.php';

    insert_teste('7', 'maomeno', 1, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
    insert_teste('6', 'bem maomeno', 2, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
    insert_teste('8', 'bao', 3, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
    buscar_teste();

    function insert_teste($titulo, $texto, $usuario_id, $data_criacao, $data_postagem) : void
    {
        $dados = ['titulo' => $titulo
                , 'texto' => $texto
                , 'usuario_id' => $usuario_id
                , 'data_criacao' => $data_criacao
                , 'data_postagem' => $data_postagem];
        insere('post', $dados);
    }

    function buscar_teste() : void
    {
        $avaliacoes = buscar('post', ['id', 'titulo', 'texto', 'usuario_id', 'data_criacao', 'data_postagem'], [],'');
        print_r($avaliacoes);
    }

    function update_teste($id, $titulo, $texto, $usuario_id, $data_criacao, $data_postagem) : void
    {
        $dados = ['titulo' => $titulo
                , 'texto' => $texto
                , 'usuario_id' => $usuario_id
                , 'data_criacao' => $data_criacao
                , 'data_postagem' => $data_postagem];
        $criterio = [['id', '=', $id]];
        atualiza('post', $dados, $criterio);
    }
    function deleta_teste($id) : void
    {
        $criterio = [['id', '=', $id]];
        deleta('post', $criterio);
    }
?>