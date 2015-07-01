<?php
namespace Instagram\Response\Users;



use Instagram\Response\AbstractMediaResponse;
use Instagram\Response\Partials\Media;
use JMS\Serializer\Annotation\Type;

class UserMediaRecentResponse extends AbstractMediaResponse
{
    /**
     * @var Media[]
     * @Type("ArrayCollection<Instagram\Response\Partials\Media>")
     */
    protected $data;

    /**
     * Desc
     *
     * @return \Instagram\Response\Partials\Media[] | \Doctrine\Common\Collections\ArrayCollection
     */
    public function getData()
    {
        return $this->data;
    }
}
