<?php

/*
 * This file is a part of the DiscordPHP project.
 *
 * Copyright (c) 2015-present David Cole <david.cole1340@gmail.com>
 *
 * This file is subject to the MIT license that is bundled
 * with this source code in the LICENSE.md file.
 */

namespace Discord\WebSockets\Events;

use Discord\Parts\Guild\Ban;
use Discord\WebSockets\Event;
use Discord\Helpers\Deferred;

/**
 * @see https://discord.com/developers/docs/topics/gateway#guild-ban-add
 */
class GuildBanAdd extends Event
{
    /**
     * @inheritdoc
     */
    public function handle(Deferred &$deferred, $data): void
    {
        /** @var Ban */
        $banPart = $this->factory->create(Ban::class, $data, true);

        if ($guild = $banPart->guild) {
            $guild->bans->pushItem($banPart);
        }

        $this->cacheUser($data->user);

        $deferred->resolve($banPart);
    }
}
