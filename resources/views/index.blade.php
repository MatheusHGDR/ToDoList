@extends('layouts.app')

@section('conteudo')

<div class="container">
    <h1 >Lista de Tarefas</h1>
    <a href="{{ route('tarefas.create') }}" class="btn">Adicionar Tarefa</a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data de Vencimento</th>
                <th>Prioridade</th>
                <th>Concluída</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarefas as $tarefa)
            <tr>
                <td>{{ $tarefa->titulo }}</td>
                <td>{{ $tarefa->descricao }}</td>
                <td>{{ $tarefa->data_vencimento }}</td>
                <td>{{ ucfirst($tarefa->prioridade) }}</td>
                <td>{{ $tarefa->concluida ? 'Sim' : 'Não' }}</td>
                <td>
                    <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn-aviso">Editar</a>
                    <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-perigo">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container2">
        <h1>Posts</h1>

        <div class="posts">
            @foreach ($posts as $post)
                <div class="post">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                </div>
            @endforeach
        </div>

        <!-- Renderiza os links de paginação -->
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>


@endsection
