<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $account_name
 * @property string $email
 * @property string $federal_id
 * @property string $password
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereFederalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Account wherePassword($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 */
	class Account extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $gender_name
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gender query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gender whereGenderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gender whereId($value)
 * @mixin \Eloquent
 */
	class Gender extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $hair_color
 * @property int $account_id
 * @property int $gender_id
 * @property int $skin_color_id
 * @property string $approval_status
 * @property string|null $approved_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereHairColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NonPlayableCharacter whereSkinColorId($value)
 * @mixin \Eloquent
 */
	class NonPlayableCharacter extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property int $account_id
 * @property int $non_playable_character_id
 * @property string $reason
 * @property string|null $rejected_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection whereNonPlayableCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcRejection whereRejectedAt($value)
 * @mixin \Eloquent
 */
	class NpcRejection extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property int $npc_id
 * @property string|null $last_checked_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcValidationQueue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcValidationQueue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcValidationQueue query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcValidationQueue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcValidationQueue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcValidationQueue whereLastCheckedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcValidationQueue whereNpcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|NpcValidationQueue whereUpdatedAt($value)
 */
	class NpcValidationQueue extends \Eloquent {}
}

namespace App\Models{
/**
 *
 *
 * @property int $id
 * @property string $skin_color_name
 * @property string $skin_color_hex
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor whereSkinColorHex($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkinColor whereSkinColorName($value)
 * @mixin \Eloquent
 */
	class SkinColor extends \Eloquent {}
}

