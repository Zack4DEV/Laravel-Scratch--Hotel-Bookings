namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roombook extends Model {
    use HasFactory;
    protected $table = 'roombook';
    public $timestamps = false; 
    protected $fillable = [
        'Name', 'Email', 'Country', 'Phone', 'RoomType', 
        'Meal', 'Bed', 'NoofRoom', 'cin', 'cout', 'nodays', 'stat'
    ];
}
