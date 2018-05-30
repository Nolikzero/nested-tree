<?

namespace App\Http\StatusCode;

use Illuminate\Http\Response;

/**
 * Class CreateCode
 * @package App\Http\StatusCode
 */
class CreateCode implements StatusCode
{
    /**
     * @param $success
     * @return int
     */
    public static function get($success)
    {
        return $success ? Response::HTTP_CREATED : Response::HTTP_UNPROCESSABLE_ENTITY;
    }
}