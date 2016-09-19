<?php

namespace FFMpeg\Filters\Audio;

use FFMpeg\Media\Audio;

class AudioFilters
{
    protected $media;

    public function __construct(Audio $media)
    {
        $this->media = $media;
    }

    /**
     * Resamples the audio file.
     *
     * @param Integer $rate
     *
     * @return AudioFilters
     */
    public function resample($rate)
    {
        $this->media->addFilter(new AudioResamplableFilter($rate));

        return $this;
    }

    /**
     * Clips (cuts) the audio.
     *
     * @param TimeCode $start
     * @param TimeCode $duration
     *
     * @return AudioFilters
     */
    public function cut($start, $duration = null)
    {
        $this->media->addFilter(new AudioCutFilter($start, $duration));

        return $this;
    }
}
