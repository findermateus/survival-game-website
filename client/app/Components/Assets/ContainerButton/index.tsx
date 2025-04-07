import DefaultButton from "~/Components/Assets/DefaultButton";
import "./styles.css"
import React from "react";

interface ContainerButtonProps {
    title: string,
    buttonText: string
}

const ContainerButton: React.FC<ContainerButtonProps> = (props) => {
    const { title, buttonText } = props;
    return <div className="container-button">
        <h3 className="linear-title-right container-title">{title}</h3>
        <DefaultButton>
            <span>{buttonText}</span>
        </DefaultButton>
    </div>
}

export default ContainerButton;