<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * Class User
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property string $avatar
 *
 * @property User $user
 */

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    public function getUploadDir()
    {
        $mainUploadDir = 'uploads';
        $dateDir = date('Ym');
        $uploadDir = public_path().DIRECTORY_SEPARATOR.$mainUploadDir.DIRECTORY_SEPARATOR.$dateDir.DIRECTORY_SEPARATOR;
        if(!File::exists($uploadDir))
            File::makeDirectory($uploadDir, 0777, true);
        return $uploadDir;
    }

    public function getUploadURL()
    {
        $mainUploadDir = 'uploads';
        $dateDir = date('Ym');
        $uploadURL = $mainUploadDir.'/'.$dateDir.'/';
        return $uploadURL;
    }

    public function generateFilename()
    {
        $time = microtime(true) * 10000;
        $rand = rand(100, 999);
        $date = date('Ymd');
        $filename = $this->id . '-'.$date.$time.$rand;
        return $filename;
    }

    public function saveAvatar(Symfony\Component\HttpFoundation\File\UploadedFile $avatar)
    {
        $uploadDir = $this->getUploadDir();
        $filename = $this->generateFilename().'.'.$avatar->getClientOriginalExtension();
        $result = $avatar->move($uploadDir.'/tmp', $filename);
        if(!empty($this->avatar))
            File::delete(public_path().$this->avatar);
        $image = new Image($result);
        $image->smart_crop(90);
        $image->save($uploadDir.$filename);
        File::delete($result);
        $this->avatar = $this->getUploadURL().$filename;
        $this->save();
    }

}