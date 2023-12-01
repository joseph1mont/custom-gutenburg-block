wp.blocks.registerBlockType("ourplugin/our-gutenburg-block-type", {
  title: "Add block title here",
  icon: "smiley",
  category: "common",
  attributes: {
    name: { type: "string" },
    address: { type: "string" },
  },
  edit: function (props) {
    function updateName(event) {
      props.setAttributes({ name: event.target.value });
    }

    function updateAddress(event) {
      props.setAttributes({ address: event.target.value });
    }

    return (
      <div>
        <input
          type="text"
          placeholder="name"
          value={props.attributes.name}
          onChange={updateName}
        />
        <input
          type="text"
          placeholder="address"
          value={props.attributes.address}
          onChange={updateAddress}
        />
      </div>
    );
  },
  save: function (props) {
    return null;
  },
});
