import "./styles.css";
import NpcInviteSectionDescription from "~/Components/NpcInviteSection/NpcInviteSectionDescription";
import DefaultButton from "~/Components/Assets/DefaultButton";

const NpcInviteSection = () => {
    return <section className="npc-invite-section">
        <div className="invite-section-container">
            <NpcInviteSectionDescription/>
            <DefaultButton>
                <span>Participe</span>
            </DefaultButton>
        </div>
    </section>
}

export default NpcInviteSection;