<?php
    require_once '../includes/funcoes.php';
    require_once '../core/conexao_mysq.php';
    require_once '../core/sql.php';
    require_once '../core/mysq.php';

    insert_teste(9, 'bao', 1, 10, date('Y-m-d H:i:s'));
    insert_teste(8, 'maomeno', 2, 10, date('Y-m-d H:i:s'));
    insert_teste(10, 'bao memo', 2, 10, date('Y-m-d H:i:s'));
    buscar_teste();
    update_teste(2, 9, 'bem bao', 1, 10, date('Y-m-d H:i:s'));
    //deleta_teste(1);
    buscar_teste();

    function insert_teste($nota, $comentario, $usuario_id, $post_id, $data_criacao) : void
    {
        $dados = ['nota' => $nota
                , 'comentario' => $comentario
                , 'usuario_id' => $usuario_id
                , 'post_id' => $post_id
                , 'data_criacao' => $data_criacao];
        insere('avaliacao', $dados);
    }

    function buscar_teste() : void
    {
        $avaliacoes = buscar('avaliacao', ['id', 'nota', 'comentario', 'usuario_id', 'post_id', 'data_criacao'], [],'');
        print_r($avaliacoes);
    }

    function update_teste($id, $nota, $comentario, $usuario_id, $post_id, $data_criacao) : void
    {
        $dados = ['nota' => $nota
                , 'comentario' => $comentario
                , 'usuario_id' => $usuario_id
                , 'post_id' => $post_id
                , 'data_criacao' => $data_criacao];
        $criterio = [['id', '=', $id]];
        atualiza('avaliacao', $dados, $criterio);
    }

    function deleta_teste($id) : void
    {
        $criterio = [['id', '=', $id]];
        deleta('avaliacao', $criterio);
    }
?>