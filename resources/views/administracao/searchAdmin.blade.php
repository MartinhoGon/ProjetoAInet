<table class="pull-right">
    <tr>
        <td>
            <div class="btn-group col-md-pull-9">
                <button class="btn letra">Listar</button>
                <button class="btn dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                    <ul class="dropdown-menu">
                        <li>

                            <a   class="letra" href="{{route('users.usersBlock')}}">Utilizadores bloqueados</a>
                            <a   class="letra" href="{{route('users.usersUnblock')}}">Utilizadores desbloqueados</a>
                            <a   class="letra" href="{{route('comments.commentsBlock')}}">Comentários bloqueados</a>
                            <a   class="letra" href="{{route('comments.commentsUnblock')}}">Comentários desbloqueados</a>
                            <a   class="letra" href="{{route('requests.pedidos')}}">Pedidos de impressão</a>

                        </li>
                    </ul>
            </div>
        </td>
        <td>
            <form class="form-search pull-right">
                <input type="text" class="input-medium search-query">
                <button type="submit" class="btn letra">Search</button>
            </form> 
        </td>
    </tr>
</table>