namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Busca todos os posts paginados, 10 por página
        $posts = Post::paginate(10);

        // Retorna para a view com os posts paginados
        return view('posts.index', compact('posts'));
    }
}
