<?php

/*
 * This file is a part of the DiscordPHP project.
 *
 * Copyright (c) 2015-present David Cole <david.cole1340@gmail.com>
 *
 * This file is subject to the MIT license that is bundled
 * with this source code in the LICENSE.md file.
 */

namespace Discord\WebSockets;

use Discord\Discord;
use Discord\Factory\Factory;
use Discord\Http\Http;
use Discord\Helpers\Deferred;
use Evenement\EventEmitterTrait;
use React\Promise\PromiseInterface;

/**
 * Contains constants for WebSocket events as well as handlers
 * for the events.
 */
abstract class Event
{
    use EventEmitterTrait;

    // General
    /** Not to be confused with 'ready' */
    public const READY = 'READY';
    public const RESUMED = 'RESUMED';
    public const PRESENCE_UPDATE = 'PRESENCE_UPDATE';
    public const PRESENCES_REPLACE = 'PRESENCES_REPLACE';
    public const TYPING_START = 'TYPING_START';
    public const USER_SETTINGS_UPDATE = 'USER_SETTINGS_UPDATE';
    public const GUILD_MEMBERS_CHUNK = 'GUILD_MEMBERS_CHUNK';
    public const INTERACTION_CREATE = 'INTERACTION_CREATE';
    public const USER_UPDATE = 'USER_UPDATE';

    // Guild
    public const GUILD_CREATE = 'GUILD_CREATE';
    public const GUILD_DELETE = 'GUILD_DELETE';
    public const GUILD_UPDATE = 'GUILD_UPDATE';

    public const GUILD_BAN_ADD = 'GUILD_BAN_ADD';
    public const GUILD_BAN_REMOVE = 'GUILD_BAN_REMOVE';

    public const GUILD_EMOJIS_UPDATE = 'GUILD_EMOJIS_UPDATE';
    public const GUILD_STICKERS_UPDATE = 'GUILD_STICKERS_UPDATE';

    public const GUILD_MEMBER_ADD = 'GUILD_MEMBER_ADD';
    public const GUILD_MEMBER_REMOVE = 'GUILD_MEMBER_REMOVE';
    public const GUILD_MEMBER_UPDATE = 'GUILD_MEMBER_UPDATE';

    public const GUILD_ROLE_CREATE = 'GUILD_ROLE_CREATE';
    public const GUILD_ROLE_UPDATE = 'GUILD_ROLE_UPDATE';
    public const GUILD_ROLE_DELETE = 'GUILD_ROLE_DELETE';

    public const GUILD_SCHEDULED_EVENT_CREATE = 'GUILD_SCHEDULED_EVENT_CREATE';
    public const GUILD_SCHEDULED_EVENT_UPDATE = 'GUILD_SCHEDULED_EVENT_UPDATE';
    public const GUILD_SCHEDULED_EVENT_DELETE = 'GUILD_SCHEDULED_EVENT_DELETE';
    public const GUILD_SCHEDULED_EVENT_USER_ADD = 'GUILD_SCHEDULED_EVENT_USER_ADD';
    public const GUILD_SCHEDULED_EVENT_USER_REMOVE = 'GUILD_SCHEDULED_EVENT_USER_REMOVE';

    public const GUILD_INTEGRATIONS_UPDATE = 'GUILD_INTEGRATIONS_UPDATE';
    public const INTEGRATION_CREATE = 'INTEGRATION_CREATE';
    public const INTEGRATION_UPDATE = 'INTEGRATION_UPDATE';
    public const INTEGRATION_DELETE = 'INTEGRATION_DELETE';
    public const WEBHOOKS_UPDATE = 'WEBHOOKS_UPDATE';
    public const APPLICATION_COMMAND_PERMISSIONS_UPDATE = 'APPLICATION_COMMAND_PERMISSIONS_UPDATE';

    public const INVITE_CREATE = 'INVITE_CREATE';
    public const INVITE_DELETE = 'INVITE_DELETE';

    public const AUTO_MODERATION_RULE_CREATE = 'AUTO_MODERATION_RULE_CREATE';
    public const AUTO_MODERATION_RULE_UPDATE = 'AUTO_MODERATION_RULE_UPDATE';
    public const AUTO_MODERATION_RULE_DELETE = 'AUTO_MODERATION_RULE_DELETE';
    public const AUTO_MODERATION_ACTION_EXECUTION = 'AUTO_MODERATION_ACTION_EXECUTION';

    // Channel
    public const CHANNEL_CREATE = 'CHANNEL_CREATE';
    public const CHANNEL_DELETE = 'CHANNEL_DELETE';
    public const CHANNEL_UPDATE = 'CHANNEL_UPDATE';
    public const CHANNEL_PINS_UPDATE = 'CHANNEL_PINS_UPDATE';

    // Threads
    public const THREAD_CREATE = 'THREAD_CREATE';
    public const THREAD_UPDATE = 'THREAD_UPDATE';
    public const THREAD_DELETE = 'THREAD_DELETE';
    public const THREAD_LIST_SYNC = 'THREAD_LIST_SYNC';
    public const THREAD_MEMBER_UPDATE = 'THREAD_MEMBER_UPDATE';
    public const THREAD_MEMBERS_UPDATE = 'THREAD_MEMBERS_UPDATE';

    // Voice
    public const VOICE_STATE_UPDATE = 'VOICE_STATE_UPDATE';
    public const VOICE_SERVER_UPDATE = 'VOICE_SERVER_UPDATE';

    // Stage Instance
    public const STAGE_INSTANCE_CREATE = 'STAGE_INSTANCE_CREATE';
    public const STAGE_INSTANCE_UPDATE = 'STAGE_INSTANCE_UPDATE';
    public const STAGE_INSTANCE_DELETE = 'STAGE_INSTANCE_DELETE';

    // Messages
    public const MESSAGE_CREATE = 'MESSAGE_CREATE';
    public const MESSAGE_DELETE = 'MESSAGE_DELETE';
    public const MESSAGE_UPDATE = 'MESSAGE_UPDATE';
    public const MESSAGE_DELETE_BULK = 'MESSAGE_DELETE_BULK';
    public const MESSAGE_REACTION_ADD = 'MESSAGE_REACTION_ADD';
    public const MESSAGE_REACTION_REMOVE = 'MESSAGE_REACTION_REMOVE';
    public const MESSAGE_REACTION_REMOVE_ALL = 'MESSAGE_REACTION_REMOVE_ALL';
    public const MESSAGE_REACTION_REMOVE_EMOJI = 'MESSAGE_REACTION_REMOVE_EMOJI';

    /**
     * The HTTP client.
     *
     * @var Http Client.
     */
    protected $http;

    /**
     * The Factory.
     *
     * @var Factory Factory.
     */
    protected $factory;

    /**
     * The Discord client instance.
     *
     * @var Discord Client.
     */
    protected $discord;

    /**
     * Constructs an event.
     *
     * @param Http    $http    The HTTP client.
     * @param Factory $factory The factory.
     * @param Discord $discord The Discord client.
     */
    public function __construct(Http $http, Factory $factory, Discord $discord)
    {
        $this->http = $http;
        $this->factory = $factory;
        $this->discord = $discord;
    }

    /**
     * Transforms the given data, and updates the
     * Discord instance if necessary.
     *
     * @param Deferred     $deferred The promise to use
     * @param array|object $data     The data that was sent with the WebSocket
     *
     * @return void|PromiseInterface
     */
    abstract public function handle(Deferred &$deferred, $data);

    /**
     * Cache User repository from Event data.
     *
     * @param object $userdata
     */
    protected function cacheUser($userdata)
    {
        // User caching
        if ($user = $this->discord->users->get('id', $userdata->id)) {
            $user->fill((array) $userdata);
        } else {
            $this->discord->users->pushItem($this->factory->create(\Discord\Parts\User\User::class, $userdata, true));
        }
    }

    public function __debugInfo(): array
    {
        return [];
    }
}
